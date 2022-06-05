
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. 
 */

Vue.component('message', require('./components/message.vue'));

const app = new Vue({
    el: '#app',
    data:{
        message:'',
        chat:{ /** Broadcast data */
            message:[],
            user:[],
            color:[],
            time:[]
        },
        numberOfUsers:0
    },
    methods:{ /** when a user sends a message */
        send(){
            if (this.message.length != 0) { 
                this.chat.message.push(this.message);
                this.chat.color.push('success');
                this.chat.user.push('You');
                this.chat.time.push(this.getTime());
                axios.post('send', { /** sends message to pusher */
                    message : this.message,
                    chat:this.chat
                  })
                  .then(response => {
                    console.log(response);
                    this.message = ''
                  })
                  .catch(error => {
                    console.log(error);
                  });
            }
        },
        getTime(){
            let time = new Date();
            return time.getHours()+':'+time.getMinutes();
        },
        getOldMessages(){
            axios.post('getOldMessage')
                  .then(response => {
                    console.log(response);
                    if (response.data != '') {
                        this.chat = response.data;
                    }
                  })
                  .catch(error => {
                    console.log(error);
                  });
        },
    },
    mounted(){ /** when a user receives a message  */
        this.getOldMessages();
        Echo.private('chat')
            .listen('ChatEvent', (e) => {
                this.chat.message.push(e.message);
                this.chat.user.push(e.user);
                this.chat.color.push('warning');
                this.chat.time.push(this.getTime());
                axios.post('saveToSession', {
                    chat : this.chat
                })
                .then(response => {
                })
                .catch(error => {
                    console.log(error);
                });
            })
        Echo.join(`chat`) /** notification of how many users in chat */
            .here((users) => {
                this.numberOfUsers = users.length;
            })
            .joining((user) => {
                this.numberOfUsers += 1;
            })
            .leaving((user) => {
                this.numberOfUsers -= 1;
            });
    }
});
