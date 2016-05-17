import { bootstrap } from 'angular2/platform/browser';
import { bind } from 'angular2/core';
import { Http, Headers, HTTP_PROVIDERS } from 'angular2/http';
import { AppComponent } from './app.component';
bootstrap(AppComponent, [HTTP_PROVIDERS]);