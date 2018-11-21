<?php

namespace App;

use Log;
use App\UsuarioEmpresa;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Usuario';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'Usuario';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;


    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be visible in arrays.
     *
     * @var array
     */
    protected $visible = ['Usuario','Nombre'];


    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->ThoWpassword;
    }

    /**
     * Validate a plain text string with the encrypted password for the user.
     *
     * @param string $plain
     * @return boolean
     */
    public function validatePassword($plain){

        $isValidPassword = false;

        $user = $this->Usuario;

        $stmt = \DB::getPdo()->prepare('EXEC dbo.spThoWValidaContrasena ?, ?, ?');

        $stmt->bindParam(1, $plain);
        $stmt->bindParam(2, $user);
        $stmt->bindParam(3, $isValidPassword, \PDO::PARAM_STR|\PDO::PARAM_INPUT_OUTPUT, 10);

        $stmt->execute();

        return filter_var($isValidPassword, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * 
     *
     * @return 
     */
    public function getEmpresas(){

        $isValidPassword = false;

        $user = $this->Usuario;

        $stmt = \DB::getPdo()->prepare('SELECT Empresa FROM ThoWUsuarioEmpresa WHERE Usuario = ?');

        $stmt->bindParam(1, $user);

        $stmt->execute();

        $empresas = $stmt->fetchAll(\PDO::FETCH_CLASS);

        if($empresas === false){
            Log::error(\DB::getPdo()->errorInfo);
            return [];
        }

        return $empresas;

    }

    public function empresas(){
        //return $this->hasManyThrough('App\Empresa','App\UsuarioEmpresa','Usuario','Empresa')->select(['Empresa.Empresa','Empresa.Nombre']);
        $user = $this->Usuario;
        return UsuarioEmpresa::where('Usuario',$user)->get(['Empresa','Nombre']);
    }
}
