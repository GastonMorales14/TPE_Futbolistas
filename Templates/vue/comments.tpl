{literal}
    <ul id="commentContainer">
        <template v-for ="comment in comments">
            <li v-if="id == comment.id_jugador">
                <div class="comment-main-level">
                    <div class="comment-box">
                        <div class="comment-head">
                            <h6 class="comment-name "><a href="">{{ comment.name }} {{ comment.surname }}</a></h6>
                            <span>{{ comment.fecha }} || {{ comment.hora }}</span>                           
                            
                            <div>
                                <label v-if="comment.puntos == 1">★</label>
                                <label v-if="comment.puntos == 2">★★</label>
                                <label v-if="comment.puntos == 3">★★★</label>
                                <label v-if="comment.puntos == 4">★★★★</label>
                                <label v-if="comment.puntos == 5">★★★★★</label>
                            </div>
                               
                        </div>
                        <div class="coment-content">
                            {{ comment.comentario }}                          
                        </div>
                        <button class="btn btn-danger mt-2" v-if="role == 1" v-on:click="deleteComment(comment.id_comentario)">Eliminar Comentario</button>
                    </div>
                </div>
            </li>
        </template>
    </ul>
{/literal}