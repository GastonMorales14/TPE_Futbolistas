"use strict"

const API_URL = "api/comentarios"

let playerId = document.querySelector("#commentSection").dataset.player;
let user = document.querySelector("#commentSection").dataset.user;

document.querySelector("#btn-comment").addEventListener("click", publishComment);


let app = new Vue({
    el: "#commentContainer",
    data:{
        comments: [],
        id: playerId,
        role : user
    },
    methods:{
        //eliminia el comentario seleccionado
        deleteComment: async function(id){
            try{
                let response = await fetch(`${API_URL}/${id}`, {
                    "method": "DELETE"
                });
                if(response.status === 200){
                    console.log("Eliminado!")
                }
            } catch (error) {
                console.log(error);
            }
            getComments(); 
        }           
        
    } 
        
})

//obtiene los comentarios de la api
async function getComments(){
    try{
        let response = await fetch(API_URL);
        let comments = await response.json();

        app.comments = comments;

    }catch(e){
        console.log(e);
    }
}

//envia el nuevo comentario a la api
async function publishComment(){
    let email = document.querySelector("#frm-comment").dataset.email;
    let date = getDate();
    let form = document.querySelector('#frm-comment');
    let formData = new FormData(form);
    let comment = formData.get('comment');
    let points = formData.get('stars');
    let newComment = {"email": email, "comment": comment, "date": date, "player": playerId, "points": points};
    try {
        let response = await fetch(API_URL, {
            "method": "POST",
            "headers": {"Content-type": "application/json"},
            "body": JSON.stringify(newComment)
        });

        if (response.status == 200) {
            console.log("Creado!");
        }
    } catch (e) {
        console.log(e);
    }

    getComments();
}

//obtiene la fecha
function getDate(){
    let date = new Date();
    let time = date.getHours();
    date.setHours(time - 3);
    return date;
}

getComments();