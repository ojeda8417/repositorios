
	function actualizar_importe()
      {
        
        var precio1=document.getElementById("precio1").value;
        var cantidad1=document.getElementById("cantidad1").value;
        var descuento1=document.getElementById("descuento1").value;

        
        var precio2=document.getElementById("precio2").value;
        var cantidad2=document.getElementById("cantidad2").value;
        var descuento2=document.getElementById("descuento2").value;
        
        var precio3=document.getElementById("precio3").value;
        var cantidad3=document.getElementById("cantidad3").value;
        var descuento3=document.getElementById("descuento3").value;
        
        var precio4=document.getElementById("precio4").value;
        var cantidad4=document.getElementById("cantidad4").value;
        var descuento4=document.getElementById("descuento4").value;
        
        var precio5=document.getElementById("precio5").value;
        var cantidad5=document.getElementById("cantidad5").value;
        var descuento5=document.getElementById("descuento5").value;
        
        var precio6=document.getElementById("precio6").value;
        var cantidad6=document.getElementById("cantidad6").value;
        var descuento6=document.getElementById("descuento6").value;
        
        var precio7=document.getElementById("precio7").value;
        var cantidad7=document.getElementById("cantidad7").value;
        var descuento7=document.getElementById("descuento7").value;
        
        var precio8=document.getElementById("precio8").value;
        var cantidad8=document.getElementById("cantidad8").value;
        var descuento8=document.getElementById("descuento8").value;
        
        var precio9=document.getElementById("precio9").value;
        var cantidad9=document.getElementById("cantidad9").value;
        var descuento9=document.getElementById("descuento9").value;
        
        var precio10=document.getElementById("precio10").value;
        var cantidad10=document.getElementById("cantidad10").value;
        var descuento10=document.getElementById("descuento10").value;
        
        var iva=document.getElementById("iva").value;
        var subtotal=document.getElementById("subtotal").value;
        
        //REALIZO EL PRIMER CALCULO
        descuento=descuento1/100;
        tot=precio1*cantidad1;
        desc=tot*descuento;
        total=tot-desc;
        var original=parseFloat(total);
        var importe1=Math.round(original*100)/100 ;
        document.getElementById("importe1").value=importe1;
        
        
        //REALIZO EL SEGUNDO CALCULO
        descuento=descuento2/100;
        tot=precio2*cantidad2;
        desc=tot*descuento;
        tot2=tot-desc;
        var orig=parseFloat(tot2);
        var importe2=Math.round(orig*100)/100 ;
        document.getElementById("importe2").value=importe2;
        
        //REALIZO EL TERCER CALCULO
        descuento=descuento3/100;
        tot=precio3*cantidad3;
        desc=tot*descuento;
        tot3=tot-desc;
        var orig=parseFloat(tot3);
        var importe3=Math.round(orig*100)/100 ;
        document.getElementById("importe3").value=importe3;
        
        //REALIZO EL CUARTO CALCULO
        descuento=descuento4/100;
        tot=precio4*cantidad4;
        desc=tot*descuento;
        tot4=tot-desc;
        var orig=parseFloat(tot4);
        var importe4=Math.round(orig*100)/100 ;
        document.getElementById("importe4").value=importe4;
        
        //REALIZO EL QUINTO CALCULO
        descuento=descuento5/100;
        tot=precio5*cantidad5;
        desc=tot*descuento;
        tot5=tot-desc;
        var orig=parseFloat(tot5);
        var importe5=Math.round(orig*100)/100 ;
        document.getElementById("importe5").value=importe5;
        
        //REALIZO EL SEXTO CALCULO
        descuento=descuento6/100;
        tot=precio6*cantidad6;
        desc=tot*descuento;
        tot6=tot-desc;
        var orig=parseFloat(tot6);
        var importe6=Math.round(orig*100)/100 ;
        document.getElementById("importe6").value=importe6;
        
        //REALIZO EL SEXTIMO CALCULO
        descuento=descuento7/100;
        tot=precio7*cantidad7;
        desc=tot*descuento;
        tot7=tot-desc;
        var orig=parseFloat(tot7);
        var importe7=Math.round(orig*100)/100 ;
        document.getElementById("importe7").value=importe7;
        
        //REALIZO EL OCTAVO CALCULO
        descuento=descuento8/100;
        tot=precio8*cantidad8;
        desc=tot*descuento;
        tot8=tot-desc;
        var orig=parseFloat(tot8);
        var importe8=Math.round(orig*100)/100 ;
        document.getElementById("importe8").value=importe8;
        
        //REALIZO EL NOVENO CALCULO
        descuento=descuento9/100;
        tot=precio9*cantidad9;
        desc=tot*descuento;
        tot9=tot-desc;
        var orig=parseFloat(tot9);
        var importe9=Math.round(orig*100)/100 ;
        document.getElementById("importe9").value=importe9;
        
        //REALIZO EL DECIMO CALCULO
        descuento=descuento10/100;
        tot=precio10*cantidad10;
        desc=tot*descuento;
        tot10=tot-desc;
        var orig=parseFloat(tot10);
        var importe10=Math.round(orig*100)/100 ;
        document.getElementById("importe10").value=importe10;

        //REALIZO EL CALCULO DEL SUBTOTAL
        var subt=Math.round(importe1+importe2+importe3+importe4+importe5+importe6+importe7+importe8+importe9+importe10);
          document.getElementById("subtotal").value=subt;
        
        
        //REALIZO EL CALCULO DEL IVA Y SUBTOTAL Y TOTAL
        var igv=(iva/100);
        var su=Math.round(subt*igv);
        var or=parseFloat(su);
        var ori=Math.round(or+subt);
        document.getElementById("subtotal2").value=or;
        document.getElementById("total").value=ori;
  }
