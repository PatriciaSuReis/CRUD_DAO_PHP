# PHP e MySQL :: CRUD – Create, Read, Update, Delete
## Códigos originais do artigo disponível em https://alexandrebbarbosa.wordpress.com/2016/01/16/php-e-mysql-crud-create-read-update-delete/
<br>

# **Atividades**

### **O que é uma "interface"?**
<hr>
<p>Em programação orientada a objetos, uma interface é um conjunto de métodos abstratos que definem um contrato entre as classes que a implementam e o código que usa essas classes. As classes que implementam uma interface devem implementar todos os métodos definidos na interface para cumprir o contrato. Isso permite que diferentes classes forneçam a mesma funcionalidade de maneira diferente, desde que implementem a mesma interface. As interfaces são usadas para permitir a comunicação entre objetos de diferentes classes de maneira flexível e genérica, aumentando a modularidade e a flexibilidade do código.
</p>

###  **O que são "traits" no PHP?**
<hr>
<p>Traits em PHP são um mecanismo de reutilização de código que permite que classes compartilhem métodos e propriedades com outras classes sem exigir uma única hierarquia de classes. Um trait é definido como uma classe que contém métodos e propriedades, mas não pode ser instanciado por si só, e é usado em conjunto com outras classes através da palavra-chave "use". Traits ajudam a evitar a duplicação de código, permitem que as classes compartilhem funcionalidades e resultam em um código mais limpo e fácil de manter.</p>

### **No código aparece o método "bindValue" do PDO para definir o valor que será utilizado na execução da instrução SQL. No PDO, também existe o método "bindParam". Qual(is) a(s) diferença(s) entre eles?**
<hr>
<p>No PDO, o método "bindValue" associa um valor diretamente ao parâmetro da instrução SQL, enquanto o método "bindParam" associa uma variável ao parâmetro, criando uma referência ao valor da variável. A principal diferença é que o valor associado ao parâmetro com "bindValue" não muda, enquanto o valor associado ao parâmetro com "bindParam" pode mudar se a variável referenciada mudar.</p>