using Aula11092019.Dados;
using Aula11092019.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using System.Web.Security;

namespace Aula11092019.Controllers
{
    public class HomeController : Controller
    {
        AcoesLogin ac = new AcoesLogin();

        public ActionResult Index(Login verLogin)
        {

            ac.TestarUsuario(verLogin);
            ViewBag.mensagem = "Digite o usuário e senha";

            if (verLogin.usuario != null && verLogin.Senha != null)
            {
                FormsAuthentication.SetAuthCookie(verLogin.usuario, false);
                Session["usuarioLogado"] = verLogin.usuario.ToString();
                Session["senhaLogado"] = verLogin.Senha.ToString();
                Session["tipoLogado"] = verLogin.tipo.ToString();


                AcoesLogin.mail = Session["usuarioLogado"].ToString();

                

                return RedirectToAction("About", "Home");
            }

            else
            {
                return View();

            }
        }


        Login log = new Login();

        public ActionResult CadLogin()
        {


            return View();
        }

        [HttpPost]
        public ActionResult CadLogin(FormCollection frm)
        {


            if ((frm["txtUsu"]) != null && (frm["txtSenha"]) != null && (frm["txtconfsenha"]) != null && frm["txtTipo"] != null)
            {
                           
                log.usuario = frm["txtUsu"];
                log.Senha = frm["txtSenha"];
                log.tipo = frm["txtTipo"];
                string ConfSenha;
                ConfSenha = frm["txtconfsenha"];

               

                if (log.Senha == ConfSenha)

                {
                    ac.inserirLogin(log);
                    return View();
                }
                else
                {
                    ViewBag.erro = "As senhas não conferem!";
                    return View();
                }
            }
            else
            {
                return View();
            }
            
        }

        public ActionResult About()
        {


            if ((Session["usuarioLogado"] == null) || (Session["senhaLogado"] == null))

            {
                return RedirectToAction("semAcesso", "Home");
            }
            else
            {
                ViewBag.teste = Session["tipoLogado"];

                return View();
            }
        }


        public ActionResult Contact()
        {
            ViewBag.Message = "Your contact page.";

            return View();
        }


        public ActionResult semAcesso()
        {
            ViewBag.Message = "Você não pode acessar essa página";

            return View();
        }


        public ActionResult Logout()
        {

            Session["usuarioLogado"] = null;
            Session["senhaLogado"] = null;
            Session["tipoLogado"] = null;
            return RedirectToAction("Index", "Home");
        }

    }
}