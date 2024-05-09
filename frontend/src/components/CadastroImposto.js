import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import '../style/StyleForm.css'; 

function CadastroImposto() {
  const [tipo, setTipo] = useState('');
  const [imposto, setImposto] = useState('');
  const navigate = useNavigate();

  const handleSubmit = (e) => {
    e.preventDefault();
    console.log({ tipo, imposto });
  };

  const handleBack = () => {
    navigate(-1);
  };

  return (
    <div className="form-container">
      <h2 className="form-title">Cadastro de Imposto</h2>
      <form onSubmit={handleSubmit}>
        <label className="form-label">
          Tipo de Produto:
          <input className="input-text" type="text" value={tipo} onChange={(e) => setTipo(e.target.value)} />
        </label>
        <label className="form-label">
          Percentual de Imposto:
          <input className="input-text" type="number" value={imposto} onChange={(e) => setImposto(e.target.value)} />
        </label>
        <div className="button-group">
          <button className="button-submit button-cadastrar" type="submit">Cadastrar Imposto</button>
          <button className="button-submit" type="button" onClick={handleBack} style={{ backgroundColor: "#6c757d" }}>Voltar</button>
        </div>
      </form>
    </div>
  );
}

export default CadastroImposto;
