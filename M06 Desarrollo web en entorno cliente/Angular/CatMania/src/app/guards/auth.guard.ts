import { Injectable } from '@angular/core';
import { ActivatedRouteSnapshot, CanActivate, Router, RouterStateSnapshot, UrlTree } from '@angular/router';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AuthGuard implements CanActivate {
  authService: any;

  constructor(
    private readonly router: Router
  ) { }

  canActivate(
    route: ActivatedRouteSnapshot,
    state: RouterStateSnapshot): Observable<boolean | UrlTree> |
    Promise<boolean | UrlTree> | boolean | UrlTree {

      //TODO: Implementar la condición para poder entrar dentro de la MainPage
      // if (this.authService.user.email != '' && this.authService.user.password != '') {
        return true;
      // } else {
      //   this.router.navigate(['/login']);
      //   return false;
      // }
      
  }

}
