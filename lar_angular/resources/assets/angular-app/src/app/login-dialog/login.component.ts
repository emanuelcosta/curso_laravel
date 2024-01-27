import { Component, OnInit, Input } from '@angular/core';
import { MatDialogRef, MatSnackBar } from '@angular/material';
import {User} from '../user';
import { PostService } from '../post.service';
import {UserService} from "../user.service";

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  hide = true;
  private dados = {
    user: new User("","","")
  };

  ngOnInit() {
  }

  constructor(public dialogRef: MatDialogRef<LoginComponent>, private userService:UserService){}

  logar(){
    console.log('login');
    this.userService.login(this.dados.user);
  }

}
