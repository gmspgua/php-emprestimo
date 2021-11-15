<?php

class Emprestimo
{
    private $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    public function adicionar(string $nome, string $contato, string $email, string $senha): void
    {
        $insereArtigo = $this->mysql->prepare('INSERT INTO cadastro (name, celular, email, senha) VALUES(?,?,?,?);');
        $insereArtigo->bind_param('ssss', $nome, $contato, $email, $senha);
        $insereArtigo->execute();
    }

    public function deletarItem(string $item): void
    {
        $insereArtigo = $this->mysql->prepare('delete from item where item = ?;');
        $insereArtigo->bind_param('s', $item);
        $insereArtigo->execute();
    }

    public function deletarUsuario(string $nome): void
    {
        $insereArtigo = $this->mysql->prepare('delete from cadastro where name = ?;');
        $insereArtigo->bind_param('s', $nome);
        $insereArtigo->execute();
    }

    public function adicionarItem(string $item, string $dtEmprestimo, string $prevEntrega, string $dtEntrega,  string $status): void
    {
        $insereArtigo = $this->mysql->prepare('INSERT INTO item (item, dtEmprestimo, prevEntrega, dtEntrega, status) VALUES(?,?,?,?,?);');
        $insereArtigo->bind_param('sssss', $item, $dtEmprestimo, $prevEntrega, $dtEntrega, $status);
        $insereArtigo->execute();
    }

    public function atualizarItem(string $item, string $dtEmprestimo, string $prevEntrega, string $dtEntrega,  string $status, string $itemOld): void
    {
        $insereArtigo = $this->mysql->prepare('UPDATE item set item = ? , dtEmprestimo = ? , prevEntrega = ?, dtEntrega = ? , status = ?  where item = ?;');
        $insereArtigo->bind_param('ssssss', $item, $dtEmprestimo, $prevEntrega, $dtEntrega, $status, $itemOld);
        $insereArtigo->execute();
    }

    public function atualizarUsuario(string $name, string $celular, string $email, string $senha,  string $nameOld): void
    {
        $insereArtigo = $this->mysql->prepare('UPDATE cadastro set name = ? , celular = ? , email = ?, senha = ?   where name = ?;');
        $insereArtigo->bind_param('sssss',$name, $celular, $email, $senha, $nameOld);
        $insereArtigo->execute();
    }

    public function recuperarLogin(string $email, string $senha): array 
    {
        $insereArtigo = $this->mysql->prepare('select name from cadastro where email = ? and senha = ?;');
        $insereArtigo->bind_param('ss', $email, $senha);
        $insereArtigo->execute();
        $result =  $insereArtigo->get_result()->fetch_assoc();


        if($result == null){
            throw new Exception('Login nao encontrado.');
        }
        return  $result;
    }

    public function recuperarItems(): array 
    {
        $insereArtigo = $this->mysql->query('select item, dtEmprestimo, prevEntrega, dtEntrega, status from item');
        $result =  $insereArtigo->fetch_all(MYSQLI_ASSOC);
      
        return  $result;
    }

    public function recuperarUsuarios(): array 
    {
        $insereArtigo = $this->mysql->query('select name, celular, email, senha from cadastro');
        $result =  $insereArtigo->fetch_all(MYSQLI_ASSOC);
      
        return  $result;
    }

}