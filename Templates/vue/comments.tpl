{literal}
    <ul id="commentContainer">
        <template v-for ="comment in comments">
            <li v-if="id == comment.fk_id_jugador">{{ comment.name }} || {{ comment.surname }} || {{ comment.comentario }} || {{ comment.fecha }} || {{ comment.hora }} || {{ comment.puntos }}</li>
            <button v-if="role == 1" v-on:click="deleteComment(comment.id_comentario)">Eliminar</button>
        </template>
    </ul>
{/literal}