import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { SignupComponent } from './components/signup/signup.component';
import { SigninComponent } from './components/signin/signin.component';
import { AuthenticationRoutingModule } from './authentification-routing.module';
import { NotLoggedInHomeComponent } from './components/not-logged-in-home/not-logged-in-home.component';


@NgModule({
  declarations: [
    SignupComponent,
    SigninComponent,
    NotLoggedInHomeComponent
  ],
  exports: [
    SignupComponent,
    SigninComponent
  ],
  imports: [
    CommonModule,
    AuthenticationRoutingModule
  ]
})
export class AuthenticationModule { }
