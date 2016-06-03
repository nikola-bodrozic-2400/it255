import {Component} from 'angular2/core';
import {RouteConfig,Router, ROUTER_DIRECTIVES} from 'angular2/router';
import { MainPageComponent } from 'app/mainpage/mainpage.component';
import { AboutUsComponent } from 'app/aboutus/aboutus.component';
import { RegisterComponent } from 'app/register/register.component';
import { FormComponent2 } from 'app/form2/form2.component';
import { LoginComponent}  from 'app/login/login.component';
import { AllRoomsComponent}  from 'app/allrooms/allrooms.component';
import { SviracuniComponent}  from 'app/sviracuni/sviracuni.component';
import {Pipe} from 'angular2/core';

@Component({
    selector: 'moja-aplikacija',
	templateUrl: 'app/router.html',
	directives: [ROUTER_DIRECTIVES]
})

@RouteConfig([
  {path:'/',    name: 'MainPage',   component: MainPageComponent, useAsDefault: true},
  {path:'/aboutus', name:'AboutUs', component: AboutUsComponent},
  {path:'/register', name:'RegisterPage', component: RegisterComponent},
  {path:'/login', name:'LoginPage', component: LoginComponent},
  {path:'/form2', name:'FormPage2', component: FormComponent2},
  {path:'/allrooms', name:'AllRoomsPage', component: AllRoomsComponent},
  {path:'/sviracuni', name:'Sviracuni', component: SviracuniComponent}
])

export class AppComponent { 
	router: Router;
	isAuth: String;
	
	constructor(router: Router) {
		this.router = router;
		  router.subscribe((val) => {
		  
		  if(localStorage.getItem('token') !== null){
				this.isAuth = "yes";
		  }else{
			    this.isAuth = "no";
		  }
		  });
	}
	
 onLogout(): void {
	localStorage.removeItem("token");
	 this.router.navigate(['./MainPage']);
	if(localStorage.getItem('token') !== null){
		this.isAuth = "yes";
	}else{
		this.isAuth = "no";
	}
 }
}
