import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { BookToSendComponent } from './book-to-send/book-to-send.component';
import { HomeComponent } from './home-page/components/home/home.component';
import { MyFriendsComponent } from './my-friends/my-friends.component';
import { MyLibraryComponent } from './my-library/my-library.component';
import { MyWishlistComponent } from './my-wishlist/my-wishlist.component';

const routes: Routes = [
    { path: '', component: HomeComponent },
    { path: 'Ma Bibliothèque', component: MyLibraryComponent },
    { path: 'Ma liste d\'envies', component: MyWishlistComponent },
    { path: 'Mes livres en vente', component: BookToSendComponent },
    { path: 'Mes amis', component: MyFriendsComponent }
];

@NgModule({
    imports: [
      RouterModule.forRoot(routes)
    ],
    exports: [
      RouterModule
    ]
  })
export class AppRoutingModule {}