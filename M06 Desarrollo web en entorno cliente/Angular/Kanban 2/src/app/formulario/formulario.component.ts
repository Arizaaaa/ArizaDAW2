import { Component, EventEmitter, Output } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { AppComponent } from '../app.component';

@Component({
  selector: 'app-formulario',
  templateUrl: './formulario.component.html',
  styleUrls: ['./formulario.component.css']
})
export class FormularioComponent extends AppComponent {

  @Output() guardarForm: EventEmitter<string> = new EventEmitter<string>();

  taskForm = new FormGroup({
    taskName: new FormControl('', [Validators.required]),
    date: new FormControl('', [Validators.required]),
  });

  onSubmit() {
    if (!this.taskForm.valid) {

    }
    else {     
      this.guardarForm.emit(JSON.stringify(this.taskForm.value));
    }

  }
}
