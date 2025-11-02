<!doctype html>
<html>
<body>
  <p>Olá {{ $loan->user->name }},</p>
  <p>Este é um lembrete de que o livro <strong>{{ $loan->book->title }}</strong> tem previsão de devolução em <strong>{{ $loan->due_at }}</strong>.</p>
  <p>Por favor, devolva o livro na data prevista.</p>
  <p>Obrigado,<br/>Biblioteca</p>
</body>
</html>
