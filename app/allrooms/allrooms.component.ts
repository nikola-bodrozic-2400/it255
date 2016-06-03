import { Component, Directive } from 'angular2/core';
import {Component, FormBuilder, Validators, ControlGroup, Control, FORM_DIRECTIVES, FORM_BINDINGS} from 'angular2/common'
import {Http, HTTP_PROVIDERS, Headers} from 'angular2/http';
import 'rxjs/Rx';
import {Router, ROUTER_PROVIDERS} from 'angular2/router'

@Component({ 
  selector: 'AllRoomsPage', 
  templateUrl: 'app/allrooms/allrooms.html',
  directives: [FORM_DIRECTIVES],
  viewBindings: [FORM_BINDINGS]
})

export class AllRoomsComponent { 

  loginForm: ControlGroup;
  http: Http;
  router: Router;
  postResponse: String;
  
   	rooms: Object[];
  constructor(builder: FormBuilder, http: Http,  router: Router) {
	this.http = http;
	this.router = router;
	var headers = new Headers();
	headers.append('Content-Type', 'application/x-www-form-urlencoded');
	headers.append('token', localStorage.getItem('token'));
	http.get('http://localhost/php/getrooms.php',{headers:headers})
		.map(res => res.json())
		.subscribe(rooms => {this.rooms = rooms.rooms; 
    $('table').DataTable();
		});
		


   
  }

}
