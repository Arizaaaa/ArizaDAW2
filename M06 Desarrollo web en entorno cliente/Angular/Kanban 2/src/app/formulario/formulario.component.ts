import { Component, EventEmitter, Output } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { AppComponent } from '../app.component';
import { Usuario } from '../models/usuario-model';

@Component({
  selector: 'app-formulario',
  templateUrl: './formulario.component.html',
  styleUrls: ['./formulario.component.css']
})
export class FormularioComponent extends AppComponent{

  @Output() guardarForm: EventEmitter<string> = new EventEmitter<string>();
  @Output() volver: EventEmitter<boolean> = new EventEmitter<boolean>();

  taskForm = new FormGroup({
    id: new FormControl(),
    titulo: new FormControl('', [Validators.required]),
    lista: new FormControl('', [Validators.required]),
    fechaFin: new FormControl(),
    img: new FormControl(),
    usuario: new FormControl(),
  });

  users:Usuario[] = [];

  ngOnInit(): void {

    if(this.info != undefined){

      console.log(this.info);
      this.taskForm.setValue({

        id: this.info.id,
        titulo: this.info.titulo,
        lista: this.info.lista,
        fechaFin: this.info.fechaFin,
        img: this.info.img,
        usuario: this.users

      });

    }
  }

  getErrorMessageTitulo() {
    if (this.taskForm.controls.titulo.hasError('required')) {
      return 'El titulo es obligatorio';
    }

    return this.taskForm.controls.titulo.hasError('required');
  }

  getErrorMessageLista() {
        if (this.taskForm.controls.lista.hasError('required')) {
      return 'El estado es obligatorio';
        }
      return this.taskForm.controls.lista.hasError('required');
  }

  onSubmit() {
    if (this.taskForm.valid) {
      this.guardarForm.emit(JSON.stringify(this.taskForm.value));
      this.volver.emit(false);
    }

  }

  volverForm() { 
    this.volver.emit(false); 
  }

}