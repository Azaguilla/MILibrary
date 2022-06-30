import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { CoreModule } from './core/core.module';
import { FontAwesomeModule } from '@fortawesome/angular-fontawesome';

import { AppComponent } from './app.component';
import { AppRoutingModule } from './app-routing.module';
import { MyLibraryComponent } from './my-library/my-library.component';
import { MyWishlistComponent } from './my-wishlist/my-wishlist.component';
import { BookToSendComponent } from './book-to-send/book-to-send.component';
import { MyFriendsComponent } from './my-friends/my-friends.component';

@NgModule({
  declarations: [
    AppComponent,
    MyLibraryComponent,
    MyWishlistComponent,
    BookToSendComponent,
    MyFriendsComponent
  ],
  imports: [
    BrowserModule,
    CoreModule,
    FontAwesomeModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
