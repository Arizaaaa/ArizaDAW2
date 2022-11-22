import { Component, Input, OnInit } from '@angular/core';
import { Tarea } from '../models/tarea-model';

@Component({
  selector: 'app-tarea',
  templateUrl: './tarea.component.html',
  styleUrls: ['./tarea.component.css']
})
export class TareaComponent implements OnInit {

  fecha = new Date("2019/01/16");

  @Input() tareas: Tarea;

  constructor() {
    this.tareas = {};
  }

  ngOnInit(): void {
  }

  compararFecha(tareas:any){

    let añoFin:number = parseInt(tareas.fechaFin.toString().substring(0, 4));
    let mesFin:number = parseInt(tareas.fechaFin.toString().substring(5, 7));
    let diaFin:number = parseInt(tareas.fechaFin.toString().substring(8, 10));

    let año:number = parseInt(this.fecha.getFullYear().toString().substring(0, 4));
    let mes:number = parseInt(this.fecha.getMonth().toString().substring(5, 7));
    let dia:number = parseInt(this.fecha.getDay().toString().substring(8, 10));

console.log(año, mes, dia);

    if(año < añoFin && tareas.lista != "Finalizadas") {return "rojo"}
    else if (año < añoFin && tareas.lista == "Finalizadas") {return "verde"}
    else if ((dia - 1) >= diaFin && dia <= diaFin) {return "naranja"}
    else {return "gris"}   

  }

}
