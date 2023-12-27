import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import {BrowserAnimationsModule} from '@angular/platform-browser/animations';

/**
 * Material Angular
 */
import {MatButtonModule} from '@angular/material/button';
import {MatToolbarModule} from '@angular/material/toolbar';
import {MatDividerModule} from "@angular/material/divider";
import {MatIconModule} from '@angular/material/icon';
import {MatCardModule} from '@angular/material/card';
import {MatInputModule} from '@angular/material/input';
import {MatSelectModule} from '@angular/material/select';
import {MatMenuModule} from '@angular/material/menu';
import { MatBadgeModule, MatChipsModule, MatDialogModule } from '@angular/material';

/**
 * Material Angular
 */
import { AppComponent } from './app.component';
import { PostComponent } from './post/post.component';
import { PostDialogComponent } from './post-dialog/post-dialog.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import {LoginComponent} from './login-dialog/login.component';

/**
 * HTTP
 */
import {HttpClientModule} from '@angular/common/http';
import { PostService } from './post.service';
import { LoginRegisterComponent } from './login-register/login-register.component';
// import { FlexLayoutModule} from '@angular/flex-layout';

@NgModule({
  declarations: [
    AppComponent,
    PostComponent,
    PostDialogComponent,
    LoginComponent,
    LoginRegisterComponent
    ],
  imports: [
    BrowserModule,
    BrowserAnimationsModule,
    FormsModule,
    ReactiveFormsModule,
    // FlexLayoutModule,
    HttpClientModule,
    MatButtonModule,
    MatInputModule,
    MatSelectModule,
    MatIconModule,
    MatToolbarModule,
    MatCardModule,
    MatDividerModule,
    MatDialogModule,
    MatChipsModule,
    MatBadgeModule,
    MatMenuModule
  ],
  providers: [
    PostService
  ],
  entryComponents:[
    PostDialogComponent, LoginComponent
  ],
  bootstrap: [AppComponent],

})
export class AppModule { }
