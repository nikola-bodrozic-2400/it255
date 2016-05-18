import { Component, Directive } from 'angular2/core';
import {Component, FormBuilder, Validators, ControlGroup, Control, FORM_DIRECTIVES, FORM_BINDINGS} from 'angular2/common'
import {Http, HTTP_PROVIDERS, Headers} from 'angular2/http';
import 'rxjs/Rx';
import {Router, ROUTER_PROVIDERS} from 'angular2/router'

@Component({ 
  selector: 'FormPage', 
  templateUrl: 'app/form/form.html',
  directives: [FORM_DIRECTIVES],
  viewBindings: [FORM_BINDINGS]
})

export class FormComponent { 

  registerForm: ControlGroup;
  http: Http;
  router: Router;
  postResponse: String;
  constructor(builder: FormBuilder, http: Http,  router: Router) {
	this.http = http;
	this.router = router;
    this.registerForm = builder.group({
     username: ["", Validators.none],
     password: ["", Validators.none],
     firstName: ["", Validators.none],
     lastName: ["", Validators.none],
   });
  }
  
  onRegister(): void {
	var data = "username="+this.registerForm.value.username+"&password="+this.registerForm.value.password+"&firstName="+this.registerForm.value.firstName+"&lastName="+this.registerForm.value.lastName;
	var headers = new Headers();
	headers.append('Content-Type', 'application/x-www-form-urlencoded');
	this.http.post('http://localhost/php/registerservice.php',data, {headers:headers})
    .map(res => res)
    .subscribe( data => this.postResponse = data,
	err => alert(JSON.stringify(err)),
	() => { 
	 if(this.postResponse._body == "ok"){
	 alert("Uspesna registracija");
	    this.router.parent.navigate(['./MainPage']);
	 }else{
		alert("Neuspesna registracija");
	 }
	 }
	);
	
  }
}
