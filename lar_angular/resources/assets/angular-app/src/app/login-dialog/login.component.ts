import { Component, OnInit, Input } from '@angular/core';
import { MatDialogRef } from '@angular/material';
import {User} from '../user';
import { PostService } from '../post.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  hide = true;
  @Input() user: User;

  ngOnInit() {
  }



  constructor(public dialogRef: MatDialogRef<LoginComponent>, private postService:PostService){}

  logar(){
    console.log('login');
    this.postService.login(this.user);
  }

}
