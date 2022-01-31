//Cuando el documento este preparado

//Cuando pase el ratón por encima del articulo, quiero que se haga grande

$(document).ready(function(){                                                        
    $("section article").hover(function(){
        $(this).addClass("aumentado")
    })
    
    //Cuando quite el ratón del articulo, quiero que se haga pequeño de vuelta
    
    $("section article").mouseout(function(){
        $(this).removeClass("aumentado")
    })
    
    //Cuando haga click en el botón anterior, quiero que la tira actual avance una casilla
    
    $(".anterior").click(function(){
        var midesfase = 0
        $(this).parent().parent().find(".ribbon").each(function(){
            midesfase = $(this).css("left")
        })
        midesfase = Math.round((midesfase.replace("px","")*1)/100)*100
        midesfase -= 200;
        console.log(midesfase)
        $(this).parent().parent().find(".ribbon").each(function(){
          $(this).css("left",(midesfase)+"px")  
        })
    })
    
    //Cuando haga click en el botón posterior, quiero que la tira actual retroceda una casilla
    
    $(".posterior").click(function(){
        var midesfase = 0
        $(this).parent().parent().find(".ribbon").each(function(){
            midesfase = $(this).css("left")
        })
        midesfase = Math.round((midesfase.replace("px","")*1)/100)*100
        midesfase += 200;
        console.log(midesfase)
        $(this).parent().parent().find(".ribbon").each(function(){
          $(this).css("left",(midesfase)+"px")  
        })
    })
    
    //Cuando sobre un artículo haga click
    
    $("article").click(function(){
        
        //A los detalles les quita la clase abierta
        
        $(this).parent().parent().next().removeClass("abierto")
        $(this).parent().parent().next().removeClass("muyabierto")
        
        //Dentro de un segundo y medio carga las nuevas caracteristicas
        
        var este = $(this)
        setTimeout(function(){
            este.parent().parent().next().find("h2").text(titulo)
            este.parent().parent().next().find("h3").text(subtitulo)
            este.parent().parent().next().find("p").text(descripcion)
            este.parent().parent().next().find("img").attr("src",imagen)
            este.parent().parent().next().addClass("abierto")
        },1500)
        
        //Cogeme los datos de título, texto, etc del artículo en el cual he hecho click
        
        var titulo = ""
        $(this).find("h3").each(function(){
            titulo = $(this).text()
        })
        var subtitulo = ""
        $(this).find("h4").each(function(){
            subtitulo = $(this).text()
        })
        var descripcion = ""
        $(this).find("p").each(function(){
            descripcion = $(this).text()
        })
        var imagen = ""
        $(this).find("img").each(function(){
            imagen = $(this).attr("src")
        })
    })
    
    //Cuando haga click en el botón de más información haz el bloque más grande todavía
    
    $(".masinfo").click(function(){
        $(this).parent().addClass("muyabierto")
    })
})