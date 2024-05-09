import React from 'react';
import { BrowserRouter as Router, Route, Routes, Link } from 'react-router-dom';
import CadastroProduto from './components/CadastroProduto';
import CadastroTipoProduto from './components/CadastroTipoProduto';
import CadastroImposto from './components/CadastroImposto';
import TelaVendas from './components/TelaVendas';
import './styles.css';

function App() {
  return (
    <Router>
      <div className="form-container">
        <h2 className="form-title"><center>Bem-vindo ao Sistema do MercadoExpert</center></h2>
        <div className="nav-links">
          <Link to="/cadastro-produto" className="button-submit">Cadastro de Produtos</Link>
          <Link to="/cadastro-tipo" className="button-submit">Cadastro de Tipos de Produtos</Link>
          <Link to="/cadastro-imposto" className="button-submit">Cadastro de Impostos</Link>
          <Link to="/vendas" className="button-submit">Tela de Vendas</Link>
        </div>
        <Routes>
          <Route path="/cadastro-produto" element={<CadastroProduto />} />
          <Route path="/cadastro-tipo" element={<CadastroTipoProduto />} />
          <Route path="/cadastro-imposto" element={<CadastroImposto />} />
          <Route path="/vendas" element={<TelaVendas />} />
          <Route path="/" element={null} />
        </Routes>
      </div>
    </Router>
  );
}

export default App;
