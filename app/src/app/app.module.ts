import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { CoreModule } from './core/core.module';
import { FontAwesomeModule } from '@fortawesome/angular-fontawesome';

import { AppComponent } from './app.component';
import { AppRoutingModule } from './app-routing.module';
import { MyFriendsComponent } from './my-friends/my-friends.component';
import { HomePageModule } from './home-page/home-page.module';
import { BooksListsModule } from './books-lists/books-lists.module';

@NgModule({
  declarations: [
    AppComponent,
    MyFriendsComponent
  ],
  imports: [
    BrowserModule,
    CoreModule,
    FontAwesomeModule,
    AppRoutingModule,
    HomePageModule,
    BooksListsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
