
$(document).ready(function(){
    $.ajax({
        url: 'conexao/carrega_nomes.php',
        type: "GET",
        dataType: 'json',
        success: function(data) {
          //console.log(data); 
          $('#datanome').empty();
          var options = '<option value="">Selecione um Nome</option>';
          if(data.length > 0) {
            $.each(data, function(key, value) {
              options += '<option>'+ value.nome + '</option>';
            });                
          } 
          $('#datanome').html(options);
        },
        error: function(xhr, status, error) {
            console.error("Status: " + status);
            console.error("Error: " + error);
            console.error("Response: " + xhr.responseText);
        }
    });
    
    $("#Moment").on("change",function(){
        nome = $("#nome").val();
        var momento = $(this).val();
        $(".carregamomento").text(nomeDoMomento);
        $(".carreganome").text(nome);
        $("#divcamponome").removeClass("opacity0");

        $.post(
            "conexao/carrega_momento.php",
            {
                nome: nome,
                momento: momento
            },
            function (result) {            
              resultm = result.split("|");

              console.log(resultm);

              $("#datepicker").val(resultm[1]);
              $("#hour").val(resultm[2]);
              $("#minute").val(resultm[3]);
            }
        )
       
    });   

    $('[type=datePicker]').datepicker({
        dateFormat: "dd/mm/yy",
        regional: "pt-BR",
        onSelect: function(dateText, inst) {
            // Formatar a data no formato "dd/mm/yyyy"
            $(this).val(dateText);
        }
    });
    
    $("#myModal").show();
    $("#datepicker").datepicker();       

    $(".iconcalendar").click(function() {
      $("#myModal").css("display", "block");
      $("#datepicker").datepicker(); // Adicionando o datepicker ao input
    });
  
    // Fechar o modal ao clicar fora dele
    $(window).click(function(event) {
      if (event.target == $("#myModal")[0]) {
        $("#myModal").css("display", "none");
      }
    });
  
    // Fechar o modal ao clicar no botão de "Confirmar"
    $(".confirmDate").click(function() {
        $('.dadoscontagem').show();
        $('.sucesso').hide();
        
        var nomeDoMomento = $("#Moment").find("option:selected").text();

        momento = $("#Moment").val();
        $(".carregamomento").text(nomeDoMomento);
        $(".carreganome").text(nome);
        
        if(momento == 'ferias'){
            document.querySelector('body').classList.add('videosucess');
            document.getElementById('video-background').src = 'videos/vocation.mp4';
        }
        else if(momento == ''){
            document.querySelector('body').classList.add('videosucess');
            document.getElementById('video-background').src = 'videos/time.mp4';
        }
        else if(momento == 'aniversario'){
            document.querySelector('body').classList.add('videosucess');
            document.getElementById('video-background').src = 'videos/niver.mp4';
        }
        else if(momento == 'namoro'){
            document.querySelector('body').classList.add('videosucess');
            document.getElementById('video-background').src = 'videos/love.mp4';      
        }
        else if(momento == 'casamento'){
            document.querySelector('body').classList.add('videosucess');
            document.getElementById('video-background').src = 'videos/lovetwo.mp4';          
        }
        else if(momento == 'anonovo'){
            document.querySelector('body').classList.add('videosucess');
            document.getElementById('video-background').src = 'videos/newyear.mp4';
            $(".carreganome").text("");
            $("#divcamponome").addClass("opacity0");
        }
        else if(momento == 'sexta'){
            document.querySelector('body').classList.add('videosucess');
            document.getElementById('video-background').src = 'videos/endfriday.mp4';
            $(".carreganome").text("");
            $("#divcamponome").addClass("opacity0");
        }
        else if(momento == 'final'){
            document.querySelector('body').classList.add('videosucess');
            document.getElementById('video-background').src = 'videos/endday.mp4';
            $(".carreganome").text("");
            $("#divcamponome").addClass("opacity0");

            function loopEffect() {
                const videoBg = document.getElementById('video-background');
                videoBg.classList.add('tv-effect');
        
                setTimeout(function () {
                    videoBg.classList.remove('tv-effect');
                }, 3000); // Duração da animação
        
                // Chamando a função novamente após a animação e um pequeno atraso
                setTimeout(loopEffect, 4000); // 3000ms de animação + 1000ms de espera
            }
            setTimeout(loopEffect, 4000);
        }

        var selectedDate = $("#datepicker").datepicker("getDate");

        var hour = $("#hour").val();
        var minute = $("#minute").val();    

        var formattedDate = selectedDate.toLocaleString('en-US', {
            month: 'short',
            day: '2-digit',
            year: 'numeric'
        }).replace(',', '') + ' ' + hour + ':' + minute + ':' + '00';

        formattedDate = formattedDate.replace(/([A-Z])\w+/g, function(m) {
            return m.toLowerCase();
        });
      
        // Definindo a data selecionada como a data de "to"        
        to = new Date(formattedDate);

        var dataParaExibir = formatarData(to);

        $(".exibirdata").html(dataParaExibir);      
      
        $("#myModal").css("display", "none");

        update();
    });
    
    $("#btnModalCloseNovo").click(function() {
        $("#myModal").css("display", "none");
    });
   
});  

function formatarData(data) {
    // Array para os nomes dos meses
    var meses = [
        "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
        "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"
    ];

    // Obtendo o mês, dia, ano, hora e minuto
    var mes = meses[data.getMonth()];
    var dia = data.getDate();
    var ano = data.getFullYear();
    var hora = ("0" + data.getHours()).slice(-2);
    var minuto = ("0" + data.getMinutes()).slice(-2);

    // Formatando a string final
    var dataFormatada = dia + " " +  " de " + mes + " de " + ano + " às " + hora + ":" + minuto;

    return dataFormatada;
}

function update(){    
    let from = new Date();
    diff = to-from; 
    if(diff>0){
        let days = setTwoDigit(Math.floor(diff/1000/60/60/24)),
        hours = setTwoDigit(Math.floor(diff/1000/60/60)%24),
        minutes = setTwoDigit(Math.floor(diff/1000/60)%60),
        seconds = setTwoDigit(Math.floor(diff/1000)%60)
        document.querySelector('.days').innerText=days
        document.querySelector('.hours').innerText=hours
        document.querySelector('.minutes').innerText=minutes
        document.querySelector('.seconds').innerText=seconds

        if (prevDays !== days) {
            prevDays = days;
            animateUnit('.clock .days div');
        }
        if (prevHours !== hours) {
            prevHours = hours;
            animateUnit('.clock .hours div');
        }
        if (prevMinutes !== minutes) {
            prevMinutes = minutes;
            animateUnit('.clock .minutes div');
        }
        if (prevSeconds !== seconds) {
            prevSeconds = seconds;
            animateUnit('.clock .seconds div');
        }
    }else{
        clearInterval(interval);
        document.querySelector('body').classList.add('videosucess');
        document.getElementById('video-background').src = 'videos/firework.mp4';
        $('.dadoscontagem').hide();
        $('.sucesso').show();
    }    
    
}

let interval=setInterval(update,1000);

function setTwoDigit(argument) {
    return argument>9?argument:'0'+argument;
}

function animateUnit(selector) {
    let element = document.querySelector(selector);
    if (element) {
        element.classList.add("animate");
        setTimeout(function () {
            element.classList.remove("animate");
        }, 800);
    }
}

$("#savemoment").on("click",function(){
    nome = $("#nome").val();
    momento = $("#Moment").val();
    data = $("#datepicker").val();
    hora = $("#hour").val();
    minuto = $("#minute").val();
   
    console.log(nome, momento, data, hora, minuto);

    $.ajax({
        type: "POST",
        url: "conexao/inserir_momento.php", // Endpoint do seu backend
        data: { 
            nome: nome, 
            momento: momento, 
            data: data, 
            hora: hora, 
            minuto: minuto 
        },
        dataType: "json",
        success: function(response) {
            console.log(response);           
            if (response.type === "success") {
                cuteToast({
                    type: "success",
                    message: response.message,
                    timer: 3000,
                }); 
            } else {
                cuteToast({
                    type: "error",
                    message: response.message,
                    timer: 3000,
                });
            }  
        },
        error: function(xhr, status, error) {
            console.error("Status: " + status);
            console.error("Error: " + error);
            console.error("Response: " + xhr.responseText);
            cuteToast({
                type: "error",
                message: "Erro ao comunicar com o servidor. Status: " + status + ", Error: " + error,
                timer: 3000,
            });
        }
    });
}); 


