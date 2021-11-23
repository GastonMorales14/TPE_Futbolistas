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
        deleteComment: async function(id){
            try{
                let res = await fetch(`${API_URL}/${id}`, {
                    "method": "DELETE"
                });
                if(res.status === 200){
                    console.log("Eliminado!")
                }
            } catch (error) {
                console.log(error);
            }
            getComments(); 
        }           
        
    } 
        
})


async function getComments(){
    try{
        let response = await fetch(API_URL);
        let comments = await response.json();

        app.comments = comments;

        console.log(user);
        console.log(comments);
    }catch(e){
        console.log(e);
    }
}

async function publishComment(e){
    e.preventDefault();
    let email = document.querySelector("#frm-comment").dataset.email;
    let date = new Date();
    let form = document.querySelector('#frm-comment');
    let formData = new FormData(form);
    let comment = formData.get('comment');
    let points = formData.get('stars');
    let newComment = {"email": email, "comment": comment, "date": date, "player": playerId, "points": points};
    try {
        let res = await fetch(API_URL, {
            "method": "POST",
            "headers": {"Content-type": "application/json"},
            "body": JSON.stringify(newComment)
        });

        if (res.status == 201) {
            console.log("Creado!");
        }
    } catch (e) {
        console.log(e);
    }

    getComments();
}

getComments();