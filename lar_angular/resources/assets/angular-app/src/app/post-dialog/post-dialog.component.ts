import { Component, OnInit } from '@angular/core';
import { MatDialogRef } from '@angular/material';
import {FormControl, Validators} from '@angular/forms';
import { Post } from '../post';

@Component({
  selector: 'app-post-dialog',
  templateUrl: './post-dialog.component.html',
  styleUrls: ['./post-dialog.component.css']
})
export class PostDialogComponent implements OnInit {

  private nomearquivo:string = '';
  private dados = {
    post: new Post("","","","",""),
    arquivo: null
  };

  email = new FormControl('', [Validators.required, Validators.email]);
  getErrorMessage() {
    return this.email.hasError('required') ? 'You must enter a value' :
        this.email.hasError('email') ? 'Not a valid email' :
            '';
  }
  
  constructor(
    public dialogRef:MatDialogRef<PostDialogComponent>
  ) { 
  }

  ngOnInit() {
  }

  mudouarquivo(event: any){
    // console.log(event.target.files[0]);
    this.nomearquivo = event.target.files[0].name;
    this.dados.arquivo = event.target.files[0];
  }

  salvar(){
    this.dialogRef.close(this.dados);
  }

  cancelar(){
    this.dialogRef.close(null);
  }

}
