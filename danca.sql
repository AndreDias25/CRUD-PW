

CREATE TABLE IF NOT EXISTS Instrutor (Cod_Instrutor int(15) NOT NULL PRIMARY KEY, Nome_Instrutor VARCHAR(255) NOT NULL,Danca_Instrutor VARCHAR(255) NOT NULL, Salario_Instrutor DECIMAL(10,2) NOT NULL, QtdedeAula int(5), Tipo_Instrutor VARCHAR(255), Aula_Individual VARCHAR(255), Aula_Noturna VARCHAR(255), Aula_Integral VARCHAR(255), Tipo_Salario VARCHAR(255));

CREATE TABLE IF NOT EXISTS Danca_de_Salao(Cod_Danca int(5) NOT NULL PRIMARY KEY, Nome_Danca VARCHAR(255) NOT NULL, Tipo_Danca VARCHAR(255) NOT NULL, Periodo_Aula VARCHAR(255), Tipo_Aula VARCHAR(255), Horario TIME NOT NULL, Qtde_Semana int(5), Cod_Instrutor int(15), FOREIGN KEY(Cod_Instrutor) REFERENCES Instrutor(Cod_Instrutor));

CREATE TABLE IF NOT EXISTS Aluno (Nr_Matricula int(15) NOT NULL PRIMARY KEY, Nome_Aluno VARCHAR(255) NOT NULL, Idade_Aluno int(5) NOT NULL, Sexo VARCHAR(255));


CREATE TABLE IF NOT EXISTS Participa (Cod_Participa int(5) NOT NULL PRIMARY KEY auto_increment, ParticipadeAula VARCHAR(255) NOT NULL, Qtde_AulasParticipadas int(5)NOT NULL, ParticipadeTurma VARCHAR(255) NOT NULL, Qtde_ParticpadeTurma int(5) NOT NULL, Cod_Danca int(5) NOT NULL, Nr_Matricula int(15) NOT NULL, FOREIGN KEY(Cod_Danca) REFERENCES Danca_de_Salao(Cod_Danca), FOREIGN KEY(Nr_Matricula) REFERENCES Aluno(Nr_Matricula));


CREATE TABLE IF NOT EXISTS Ensina (Cod_Ensina int(5) NOT NULL PRIMARY KEY auto_increment, Cod_Instrutor int(15) NOT NULL, Nr_Matricula int(15) NOT NULL, FOREIGN KEY(Cod_Instrutor) REFERENCES Instrutor (Cod_Instrutor), FOREIGN KEY(Nr_Matricula) REFERENCES Aluno (Nr_Matricula)); 

