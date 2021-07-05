import axios from 'axios'
import React, { Component } from 'react'
import { Link } from 'react-router-dom'

class TransactionsList extends Component {
  constructor () {
    super()
    this.state = {
      transactions: []
    }
  }

  componentDidMount () {
    axios.get('/api/transactions').then(response => {
      this.setState({
        transactions: response.data
      })
    })
  }

  render () {

    const { transactions } = this.state
    return (
      <div className='container py-4'>
        <div className='row justify-content-center'>
          <div className='col-md-8'>
            <div className='card'>
            <Link className='btn btn-primary btn-sm mb-3' to='/create'>
                  Create New Sacco
                </Link>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <Link className='btn btn-primary btn-sm mb-3' to='/viewSaccos'>
                  View Saccos
                </Link>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <Link className='btn btn-primary btn-sm mb-3' to='/'>
                  Refresh Transactions
                </Link>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                {/*<<Link className='btn btn-primary btn-sm mb-3' to='/createIndividual'>
                  Create New Individual
                </Link> */}
                <br/><br/>
              <div className='card-header'>All Transactions &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              
              </div>
              <br/><br/>
              <div className='card-body'>
                
              <div className='table-responsive'>
              
              <table className='table table-striped table-hover'>
                        <thead>
                        <tr>
                            <th>Row Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Sacco</th>
                            <th>Country</th>
                            <th>Amount</th>
                            <th>Tran Type</th>
                        </tr>
                        </thead>
                        <tbody id='transactions'>
                            {
                                transactions.map((transaction) => (
                                    <tr key={transaction.RowId} to={`/${transaction.RowId}`}>
                                        <td>{transaction.RowId}</td>
                                        <td>{transaction.FirstName}</td>
                                        <td>{transaction.LastName}</td>
                                        <td>{transaction.Sacco}</td>
                                        <td>{transaction.Country}</td>
                                        <td>{transaction.Amount}</td>
                                        <td>{transaction.TranType}</td>
                                    </tr>
                                ))
                            }
                        </tbody>
                    </table>
                    <div className='col-md-12 text-center'>
                      <ul className='pagination pagination-lg pager' id='developer_page'></ul>
                    </div>
                    </div>
               
              </div>
            </div>
          </div>
        </div>
      </div>
    )
  }
}

export default TransactionsList