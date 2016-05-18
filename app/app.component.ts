import {Component} from 'angular2/core';
import {RouteConfig, ROUTER_DIRECTIVES} from 'angular2/router';
import { MainPageComponent } from 'app/mainpage/mainpage.component';
import { AboutUsComponent } from 'app/aboutus/aboutus.component';
import { FormComponent } from 'app/form/form.component';
import { FormComponent2 } from 'app/form2/form2.component';
import {Pipe} from 'angular2/core';

@Component({
    selector: 'moja-aplikacija',
	templateUrl: 'app/router.html',
	directives: [ROUTER_DIRECTIVES]
})

@RouteConfig([
  {path:'/',    name: 'MainPage',   component: MainPageComponent, useAsDefault: true},
  {path:'/aboutus', name:'AboutUs', component: AboutUsComponent},
  {path:'/form', name:'FormPage', component: FormComponent},
  {path:'/form2', name:'FormPage2', component: FormComponent2},
])

export class AppComponent { 
}
