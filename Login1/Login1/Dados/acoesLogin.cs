using Login1.Models;
using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace Login1.Dados
{
    public class acoesLogin
    {
        clConexao con = new clConexao();
        public static string mail;
        public void inserirNome(Login cm)
        {
            MySqlCommand cmd = new MySqlCommand("insert into cadCliente(Email_Cli,Senha_Cli) values(@email,@senha)", con.MyConectarBD());

            cmd.Parameters.Add("@email", MySqlDbType.VarChar).Value = cm.EmailCli;
            cmd.Parameters.Add("@senha", MySqlDbType.VarChar).Value = cm.Senha;

            cmd.ExecuteNonQuery();
            con.MyDesconectarBD();

        }

        public void TestarUsuario(Login user)

        {

            MySqlCommand cmd = new MySqlCommand("select * from cadCliente where Email_Cli = @Email and Senha_Cli = @Senha ", con.MyConectarBD());

            cmd.Parameters.Add("@Email", MySqlDbType.VarChar).Value = user.EmailCli;

            cmd.Parameters.Add("@Senha", MySqlDbType.VarChar).Value = user.Senha;

            MySqlDataReader leitor;

            leitor = cmd.ExecuteReader();

            if (leitor.HasRows)

            {

                while (leitor.Read())

                {

                    {
                        user.EmailCli = Convert.ToString(leitor["Email_Cli"]);
                        user.Senha = Convert.ToString(leitor["Senha_Cli"]);
                    }
                }
            }
            else
            {
                user.EmailCli = null;
                user.Senha = null;
            }

            con.MyDesconectarBD();
        }
    }
}