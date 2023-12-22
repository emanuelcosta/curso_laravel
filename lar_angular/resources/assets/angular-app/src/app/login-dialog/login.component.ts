import { Component, OnInit } from '@angular/core';
import { MatDialogRef } from '@angular/material';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  hide = true;
  ngOnInit() {
  }

  constructor(public dialogRef: MatDialogRef<LoginComponent>){}

  logar(){
    console.log('login');
  }

}
