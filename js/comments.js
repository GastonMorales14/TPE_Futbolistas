"use strict"

const API_URL = "api/comentarios"

let app = new Vue({
    el: "#commentContainer",
    data:{
        comments: [],
    } 
        
})

async function getComments(){
    try{
        let response = await fetch(API_URL);
        let comments = await response.json();

        app.comments = comments;
    }catch(e){
        console.log(e);
    }
}

getComments();

console.log(app.comments);