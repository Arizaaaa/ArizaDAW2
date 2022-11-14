import { Component } from '@angular/core';
import { Evento } from './models/evento.model';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'InputSimple';
  listaEventos: Evento[] = [
    {titulo: "Rezo diario con Adahi", direccion: "Pa'la meca", fecha: new Date()}, 
    {titulo: "Clase sexual con Anna Gebczyk", direccion: "Carrer Alcalde Sala, 42", fecha: new Date()}, 
    {titulo: "Actividades de geriátrico con Don Antonio", direccion: "Ilerna", fecha: new Date()} 
  ]
}
