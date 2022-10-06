import { Component } from '@angular/core';

interface Character {
  name: string;
  strength: number;
  agility: number;
  intelligence: number;
  life: number;
  editable?: boolean;
  button: string;
}

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {

  mostrar:string = "";

  serverCharacters: Character[] = [];

  constructor() {
    // Ejemplo de respuesta de un servidor en formato JSON
    const serverJson = `[
      {"name": "Jugger", "strength": 18, "agility": 12, "intelligence": 6, "life": 30, "editable": false, "button": "Edit" },
      {"name": "Pelegrin", "strength": 20, "agility": 8, "intelligence": 6, "life": 40, "editable": false, "button": "Edit" },
      {"name": "Dorthak", "strength": 12, "agility": 18, "intelligence": 10, "life": 16, "editable": false, "button": "Edit" } ,
      {"name": "Kharak", "strength": 8, "agility": 20, "intelligence": 12, "life": 14, "editable": false, "button": "Edit" },
      {"name": "Perz", "strength": 10, "agility": 6, "intelligence": 20, "life": 10, "editable": false, "button": "Edit" }
    ]`;

    // Parseamos la información y la convertimos directamente en un array de "Character"
    this.serverCharacters = JSON.parse(serverJson);
  }

  edit(character:Character, mostrar:string):any {

    console.log(character.editable);

    if (character.editable != false) {
      character.editable = false;
      character.button = "Edit";
    } else if (character.editable == false){
      character.editable = true;
      character.button = "Save";
    }

    return mostrar  = JSON.stringify("name: " + character.name + ", strength: " + character.strength + ", character.agility: " + character.agility + ", character.intelligence: " + character.intelligence + ", character.life: " + character.life);
  
  }

}