import { Component, OnInit } from '@angular/core';

interface calendario{
  nombre:string;
  semana:string[];
  dias:any[];
  diaInicial:number;
  diaFinal:number;
  nacional:any;
  regional:any;
  local:any;
  centro:any;
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

  septiembre:Array <calendario> = [
    {nombre:"Septiembre", semana:['L', 'M', 'X', 'J', 'V', 'S','D'], dias:[], diaInicial:3, diaFinal:30, nacional:0, regional:11, local:29, centro:0},
  ]

  octubre:Array <calendario> = [
    {nombre:"Octubre", semana:['L', 'M', 'X', 'J', 'V', 'S','D'], dias:[], diaInicial:5, diaFinal:31, nacional:12, regional:0, local:0, centro:31}
  ]

  public constructor(){
    
    this.crearMes(this.septiembre);
    this.crearMes(this.octubre);

  }

  crearMes(mes:Array<calendario>){

    let contador:number = 0;

    for(let i = 0; i < mes[0].diaFinal + contador; i++){

      if(i >= mes[0].diaInicial){ mes[0].dias[i] = i - (contador - 1); }
      else {contador++;}

    }

  }

}