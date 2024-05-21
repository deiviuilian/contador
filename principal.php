<?php
	//HEAD DO HTML
	include 'php\ClassMontarHtml.php';
	$MontarHtml = new MontarHtml; //INICIO HTML
	$MontarHtml->MontarHead('padrao'); //HEAD DO HTML
?>	
    
<body> 
    <div class="divbuttoncalendar">
        <i class="fa fa-calendar iconcalendar" aria-hidden="true"></i>
    </div>  
    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar" id="btnModalCloseNovo">
                    <span class="closespan" aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modalLabel"> <label for="datepicker"></label></h4>					
            </div>
            <div class="modal-body">
                <div id="divcamponome" class="inputboxatualusercamp">
                    <label class="labelformusuariosnobg">Nome </label>                                        
                    <div class="displayflex">
                        <div class="input-group2">
                            <input list="datanome" id="nome" name="nome" class="campo-formnm">
                        </div>							
                    </div>
                    <datalist id="datanome"></datalist>	                   
                </div>		
                <div class="inputboxatualusercamp">
                    <label class="labelformusuariosnobg">Momento</label>
                    <select class="campo-formnm" id="Moment">	
                        <option value="" selected></option>							
                        <option value="ferias">FÉRIAS</option>	
                        <option value="aniversario">ANIVERSÁRIO</option>
                        <option value="namoro">ANIVERSÁRIO DE NAMORO</option>	
                        <option value="casamento">ANIVERSÁRIO DE CASAMENTO</option>	                            	
                        <option value="anonovo">ANO NOVO</option>	
                        <option value="sexta">SEXTA-FEIRA</option>
                        <option value="final">FINAL EXPEDIENTE</option>				
                    </select>
                </div>
                <div class="inputboxatualuserdate">
                    <label class="labelformusuariosnobgdate">Data</label>
                    <span class="input-icon fa fa-calendar"></span>
                    <input type="datePicker" id="datepicker" class="campo-formnm" maxlength="10">
                </div>

                <div class="divcampclock">                       
                    <div class="inputboxatualuser">
                        <label class="labelformusuariosnobg">Horas</label>                            
                        <input type="number" id="hour" class="campo-formnm2" min="00" max="23" value="0">
                    </div>
                
                    <div class="inputboxatualuser">
                        <label class="labelformusuariosnobg">Minutos</label>                    
                        <input type="number" id="minute" class="campo-formnm2" min="00" max="59" value="0">
                    </div> 
                </div>
            </div>
            <div class="modal-footer">
                <button id="savemoment" class="btn save">
                    <i class="fa-regular fa-floppy-disk"></i> Salvar
                </button>
                <button class="btn confirmDate">Confirmar</button>                    
            </div>
        </div>
    </div>
    <div class="divcontainer">           
        <video autoplay loop muted id="video-background" class="videobkgrd">
            <source src="videos/time.mp4" type="video/mp4">
            Seu navegador não suporta vídeos em HTML5.
        </video>
        <h1 class="sucesso">CHEGOU O MOMENTO ESPERADO!!!</h1>
        <div class="dadoscontagem">
            <h1 class="title">Contagem 
                <a class="carregamomento"></a>
                <p class="carreganome"></p>
                <p class="exibirdata"></p>
            </h1>
            
            <div class="clock">
                <div class="days"></div>
                <div class="colon">:</div>
                <div class="hours"></div>
                <div class="colon">:</div>
                <div class="minutes"></div>
                <div class="colon">:</div>
                <div class="seconds"></div>
            </div>
        </div>
    </div>
<?php $MontarHtml->MontarScripts('padrao'); ?>
