"use strict"

const URL = "api/characters/";

let characters = [];

let form = document.querySelector('#character-form');
form.addEventListener('submit', insertCharacter);


async function getAll() {
    try {
        let response = await fetch(URL);
        if (!response.ok) {
            throw new Error('Recurso no existe');
        }
        characters = await response.json();

        showCharacters();
    } catch(e) {
        console.log(e);
    }
}



async function insertCharacter(e) {
    e.preventDefault();
    
    let data = new FormData(form);
    let character = {
        personaje: data.get('personaje'),
        raza: data.get('raza'),
        afiliacion: data.get('afiliacion'),
        lgbt: data.get('lgbt'),
        fem: data.get('fem'),
        universo: data.get('universo'),
    };

    try {
        let response = await fetch(URL, {
            method: "POST",
            headers: { 'Content-Type': 'application/json'},
            body: JSON.stringify(character)
        });
        if (!response.ok) {
            throw new Error('Error del servidor');
        }

        let nCharacter = await response.json();


        characters.push(nCharacter);
        showCharacters();

        form.reset();
    } catch(e) {
        console.log(e);
    }
} 

async function deleteCharacter(e) {
    e.preventDefault();
    try {
        let id = e.target.dataset.character;
        let response = await fetch(URL + id, {method: 'DELETE'});
        if (!response.ok) {
            throw new Error('Recurso no existe');
        }

        
        characters = characters.filter(character => character.id != id);
        showCharacters();
    } catch(e) {
        console.log(e);
    }
}

function showCharacters() {
    let ul = document.querySelector("#character-list");
    ul.innerHTML = "";
    for (const character of characters) {

        let html = `
            <li>
                <span> <b>${character.personaje}</b> ${character.raza} <b>${character.afiliacion}</b>
                    <b>${character.lgbt}</b> <b>${character.fem}</b> ${character.universo}</span>
                <div class="ml-auto">
                    <a href='#' data-character="${character.id}" type='button' class='btn btn-danger btn-delete'>Borrar</a>
                </div>
            </li>
        `;

        ul.innerHTML += html;
    }


    const btnsDelete = document.querySelectorAll('a.btn-delete');
    for (const btnDelete of btnsDelete) {
        btnDelete.addEventListener('click', deleteCharacter);
    }
}

getAll();
