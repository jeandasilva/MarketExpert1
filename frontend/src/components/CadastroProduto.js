
import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import '../style/StyleForm.css'; 
function CadastroProduto() {
  const [nome, setNome] = useState('');
  const [tipo, setTipo] = useState('');
  const [preco, setPreco] = useState('');
  const [quantidade, setQuantidade] = useState('');
  const navigate = useNavigate();

  const handleSubmit = async (e) => {
    e.preventDefault();
    console.log({ nome, tipo, preco, quantidade });
  };

  const handleBack = () => {
    navigate(-1);
  };

  return (
    <div className="form-container">
      <h2 className="form-title">Cadastro de Produto</h2>
      <form onSubmit={handleSubmit}>
        <label className="form-label">
          Nome do Produto:
          <input className="input-text" type="text" value={nome} onChange={(e) => setNome(e.target.value)} />
        </label>
        <label className="form-label">
          Tipo de Produto:
          <input className="input-text" type="text" value={tipo} onChange={(e) => setTipo(e.target.value)} />
        </label>
        <label className="form-label">
          Preço:
          <input className="input-text" type="float" value={preco} onChange={(e) => setPreco(e.target.value)} />
        </label>
        <label className="form-label">
          Quantidade em Estoque:
          <input className="input-text" type="number" value={quantidade} onChange={(e) => setQuantidade(e.target.value)} />
        </label>
        <div className="button-group">
          <button className="button-submit button-cadastrar" type="submit">Cadastrar Produto</button>
          <button className="button-submit" type="button" onClick={handleBack} style={{ backgroundColor: "#6c757d" }}>Voltar</button>
        </div>
      </form>
    </div>
  );
}

export default CadastroProduto;