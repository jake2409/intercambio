using Login1.Dados;
using Login1.Models;
using System;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using System.Web.Security;

namespace Login1.Controllers
{
    public class HomeController : Controller
    {
        acoesLogin acesso = new acoesLogin();
        clConexao con = new clConexao();
        Login log = new Login();

        public ActionResult CadLogin(FormCollection frm)
        {
            if ((frm["nEmail"]) != null && (frm["nPas"]) != null && (frm["nConfPas"]) != null)
            {
                log.EmailCli = frm["nEmail"];
                log.Senha = frm["nPas"];
                string confsenha = frm["nConfPas"];
                if (log.Senha == confsenha)
                {
                    acesso.inserirNome(log);
                }
                else
                    ViewBag.Error = "[ERRO] As senhas não são iguais!";
            }
            return View();
        }
        
        public ActionResult Index(Login verLogin)
        {
            acesso.TestarUsuario(verLogin);

            ViewBag.mensagem = "Digite o usuário e senha";

            if (verLogin.EmailCli != null && verLogin.Senha != null)

            {

                FormsAuthentication.SetAuthCookie(verLogin.EmailCli, false);

                Session["usuarioLogado"] = verLogin.EmailCli.ToString();

                Session["senhaLogado"] = verLogin.Senha.ToString();

                acoesLogin.mail = Session["usuarioLogado"].ToString();

                return RedirectToAction("About", "Home");

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

                ViewBag.Message = "Your application description page.";

                return View();

            }
        }

        public ActionResult Contact()
        {
            ViewBag.Message = "Your contact page.";

            return View();
        }
    }
}