import { Component, OnInit } from '@angular/core';
import { NgModelGroup } from '@angular/forms';
import { InitialNavigation } from '@angular/router';

interface Character {
  show: boolean;
  name: string;
  strength: number;
  agility: number;
  intelligence: number;
  life: number;
  editable?: boolean;
  button: string;
  button2: string;
}

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit{

  mostrar:string = "";

  serverCharacters: Character[] = [];

  constructor() {
    // Ejemplo de respuesta de un servidor en formato JSON
    const serverJson = `[
      {"name": "Jugger", "strength": 18, "agility": 12, "intelligence": 6, "life": 30, "editable": false, "button": "Edit", "show": false, "button2": "Show" },
      {"name": "Pelegrin", "strength": 20, "agility": 8, "intelligence": 6, "life": 40, "editable": false, "button": "Edit", "show": false, "button2": "Show" },
      {"name": "Dorthak", "strength": 12, "agility": 18, "intelligence": 10, "life": 16, "editable": false, "button": "Edit", "show": false, "button2": "Show" },
      {"name": "Kharak", "strength": 8, "agility": 20, "intelligence": 12, "life": 14, "editable": false, "button": "Edit", "show": false, "button2": "Show" },
      {"name": "Perz", "strength": 10, "agility": 6, "intelligence": 20, "life": 10, "editable": false, "button": "Edit", "show": false, "button2": "Show" }
    ]`;

    // Parseamos la información y la convertimos directamente en un array de "Character"
    this.serverCharacters = JSON.parse(serverJson);
  }
  
  ngOnInit(): void {
    throw new Error('Method not implemented.');
  }

  edit(character:Character, mostrar:string):any {

    if (character.editable != false) {
      character.editable = false;
      character.button = "Edit";
    } else if (character.editable == false){
      character.editable = true;
      character.button = "Save";
    }

    return mostrar  = JSON.stringify("name: " + character.name + ", strength: " + character.strength + ", agility: " + character.agility + ", intelligence: " + character.intelligence + ", life: " + character.life + ", shown: " + character.show);
  
  }

  hide(character:Character, mostrar:string): any{

    if(character.show == true){
      character.show = false;
      character.button2 = "Show";
    } else if (character.show == false){
      character.show = true;
      character.button2 = "Hide";
    }

    return mostrar  = JSON.stringify("name: " + character.name + ", strength: " + character.strength + ", agility: " + character.agility + ", intelligence: " + character.intelligence + ", life: " + character.life + ", shown: " + character.show);


  }

}