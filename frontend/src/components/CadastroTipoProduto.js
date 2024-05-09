import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import '../style/StyleForm.css'; 

function CadastroTipoProduto() {
  const [tipo, setTipo] = useState('');
  const navigate = useNavigate();

  const handleSubmit = (e) => {
    e.preventDefault();
    console.log({ tipo });
  };

  const handleBack = () => {
    navigate(-1);
  };

  return (
    <div className="form-container">
      <h2 className="form-title">Cadastro de Tipos de Produtos</h2>
      <form onSubmit={handleSubmit}>
        <label className="form-label">
          Tipo de Produto:
          <input className="input-text" type="text" value={tipo} onChange={(e) => setTipo(e.target.value)} />
        </label>
        <div className="button-group">
          <button className="button-submit button-cadastrar" type="submit">Cadastrar Tipo</button>
          <button className="button-submit" type="button" onClick={handleBack} style={{ backgroundColor: "#6c757d" }}>Voltar</button>
        </div>
      </form>
    </div>
  );
}

export default CadastroTipoProduto;