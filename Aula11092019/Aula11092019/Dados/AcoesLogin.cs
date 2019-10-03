using Aula11092019.Models;
using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace Aula11092019.Dados
{
    public class AcoesLogin
    {
        conexao con = new conexao();
        public void inserirLogin(Login cm)
        {
            MySqlCommand cmd = new MySqlCommand("insert into tbLogin(usuario, senha, tipo) values(@EmailCli, @Senha, @Tipo)", con.MyConectarBD());

            cmd.Parameters.Add("@EmailCli", MySqlDbType.VarChar).Value = cm.usuario;
            cmd.Parameters.Add("@Senha", MySqlDbType.VarChar).Value = cm.Senha;
            cmd.Parameters.Add("@Tipo", MySqlDbType.VarChar).Value = cm.tipo;

            cmd.ExecuteNonQuery();
            con.MyDesconectarBD();

        }
       
        public static string mail;

        public void TestarUsuario(Login user)
        {
            MySqlCommand cmd = new MySqlCommand("select * from tbLogin where usuario = @usuario and senha = @Senha ", con.MyConectarBD());

            cmd.Parameters.Add("@usuario", MySqlDbType.VarChar).Value = user.usuario;
            cmd.Parameters.Add("@Senha", MySqlDbType.VarChar).Value = user.Senha;

            MySqlDataReader leitor;

            leitor = cmd.ExecuteReader();

            if (leitor.HasRows)
            {
                while (leitor.Read())
                {

                    {
                        user.usuario = Convert.ToString(leitor["usuario"]);
                        user.Senha = Convert.ToString(leitor["Senha"]);
                        user.tipo  = Convert.ToString(leitor["tipo"]);
                    }
                }

            }

            else
            {
                user.usuario = null;
                user.Senha = null;
                user.tipo = null;
            }

            con.MyDesconectarBD();
        }

    }
}