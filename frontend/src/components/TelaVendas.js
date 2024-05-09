import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import '../style/StyleForm.css';

function TelaVendas() {
  const [produto, setProduto] = useState('');
  const [quantidade, setQuantidade] = useState('');
  const navigate = useNavigate();

  const handleSubmit = (e) => {
    e.preventDefault();
    console.log({ produto, quantidade });
  };

  const handleBack = () => {
    navigate(-1);
  };

  return (
    <div className="form-container">
      <h2 className="form-title">Vendas</h2>
      <form onSubmit={handleSubmit}>
        <label className="form-label">
          Produto:
          <input className="input-text" type="text" value={produto} onChange={(e) => setProduto(e.target.value)} />
        </label>
        <label className="form-label">
          Quantidade:
          <input className="input-text" type="number" value={quantidade} onChange={(e) => setQuantidade(e.target.value)} />
        </label>
        <div className="button-group">
          <button className="button-submit" type="submit">Registrar Venda</button>
          <button className="button-submit" type="button" onClick={handleBack} style={{ backgroundColor: "#6c757d" }}>Voltar</button>
        </div>
      </form>
    </div>
  );
}

export default TelaVendas;
