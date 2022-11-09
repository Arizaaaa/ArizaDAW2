import { Component, OnInit } from '@angular/core';

interface calendario{
  nombre:string;
  semana:string[];
  dias:any[];
  festivos:any[]
  diaInicial:number;
  diaFinal:number;
  nacional:any[];
  regional:any[];
  local:any[];
  centro:any[];
}

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})

export class AppComponent{

  colorNacional:string = "rgb(0, 212, 28)";
  colorRegional:string = "rgb(179, 127, 228)";
  colorLocal:string = "rgb(202, 102, 152)";
  colorCentro:string = "rgb(211, 208, 9)";

  calendar:Array <calendario> = [
    {nombre:"Septiembre", semana:['L', 'M', 'X', 'J', 'V', 'S','D'], dias:[], festivos:[], diaInicial:3, diaFinal:30, nacional:[], regional:[11], local:[29], centro:[]},
    {nombre:"Octubre", semana:['L', 'M', 'X', 'J', 'V', 'S','D'], dias:[], festivos:[], diaInicial:5, diaFinal:31, nacional:[12], regional:[], local:[], centro:[31]}
  ];

  public constructor(){
    
    this.crearMes(this.calendar);

  }

  crearMes(mes:Array<calendario>){

    let contador:number = 0;
    let fiesta:boolean = false;

    for(let i = 0; i < mes.length; i++){

      for(let j = 0; j < mes[i].diaFinal + contador; j++){

        if(j >= mes[i].diaInicial){ 
          
          mes[i].dias[j] = (j - (contador - 1)); 
          
          for(let k = 0; k < mes[i].nacional.length; k++){ if(mes[i].dias[j] == mes[i].nacional[k]){ fiesta = true; } }

          for(let k = 0; k < mes[i].regional.length; k++){ if(mes[i].dias[j] == mes[i].regional[k]){ fiesta = true; } }

          for(let k = 0; k < mes[i].local.length; k++){ if(mes[i].dias[j] == mes[i].local[k]){ fiesta = true; } }

          for(let k = 0; k < mes[i].centro.length; k++){ if(mes[i].dias[j] == mes[i].centro[k]){ fiesta = true; } }

          if(fiesta){ mes[i].festivos[j] = true; fiesta = false; } 
          else { mes[i].festivos[j] = false; } 

        }
        else {contador++;}
        
      }
      contador = 0;

    }
  }
}