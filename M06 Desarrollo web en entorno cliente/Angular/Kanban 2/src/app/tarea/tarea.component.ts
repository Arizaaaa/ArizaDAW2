import * as moment from 'moment';
import { Component, Input, Output, EventEmitter, OnInit } from '@angular/core';
import { Tarea } from '../models/tarea-model';
import { AppComponent } from '../app.component';

@Component({
  selector: 'app-tarea',
  templateUrl: './tarea.component.html',
  styleUrls: ['./tarea.component.css']
})
export class TareaComponent implements OnInit {

  date = moment().format('YYYY-MM-DD');

  @Input() tareas: Tarea;

  constructor() { this.tareas = {id:0, lista:"", img:"", titulo:"", usuarios:[{email:"", img:"", nick:"", alt:""}], fechaFin:new Date()}; }
  ngOnInit(): void {  }

  compararFecha(tareas:any){

    let ayer = moment(this.date, 'YYYY-MM-DD').subtract(-1, 'days');
    let fecha = moment(this.date, 'YYYY-MM-DD'); 
    let fin = moment(tareas.fechaFin, 'YYYY-MM-DD');

    if (fin.isSame(ayer) || fin.isSame(fecha)) { return "naranja" }
    else if (fin.isBefore(fecha) && tareas.lista == "Finalizadas") { return "verde" }
    else if (fin.isBefore(fecha) && tareas.lista != "Finalizadas") { return "rojo" }
    else {return "gris"}
  }
}