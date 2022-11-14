import { Component, Input, OnInit } from '@angular/core';
import { Evento } from '../models/evento.model';

@Component({
  selector: 'app-evento',
  templateUrl: './evento.component.html',
  styleUrls: ['./evento.component.css']
})
export class EventoComponent implements OnInit {

  @Input() evento: Evento;

  constructor() {
    this.evento = { 
      titulo: "Actividades de geriátrico con Don Antonio", 
      direccion: "Ilerna", 
      fecha: new Date() 
    };
  }

  ngOnInit(): void {
  }

}
