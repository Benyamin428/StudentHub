@extends('layouts.app')

@section('content')

    <div class="row" id="app">
        <div class="col-md-offset-3 col-md-6">
            <li class="list-group-item active">Six 21 Group Chat <span class="label label-danger">@{{ numberOfUsers }}</span></li>
            <ul class="list-group" v-chat-scroll>

                <message v-for="value,index in chat.message":key=value.index :color = chat.color[index] :user = chat.user[index] :time = chat.time[index]>
                    @{{ value }}
                </message>

            </ul>
            <input type="text" class="form-control" placeholder="Type your message here..." v-model='message' v-on:keyup.enter='send'>
        </div>
    </div>

@endsection