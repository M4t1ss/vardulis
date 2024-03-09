import classNames from 'classnames'

type Props = {
  index: number
  size: number
  label: string
  isCurrentDayStatRow: boolean
}

export const Progress = ({
  index,
  size,
  label,
  isCurrentDayStatRow,
}: Props) => {
  const currentRowClass = classNames(
    'text-xs font-medium text-blue-100 text-center p-0.5 rounded-full',
    { 'bg-blue-600': isCurrentDayStatRow, 'bg-gray-500': !isCurrentDayStatRow }
  )
  return (
    <div className="flex justify-left m-1">
      <div className="items-center justify-center w-2">{index + 1}</div>
      <div className="bg-gray-200 w-full ml-2 rounded-full">
        <div style={{ width: `${8 + size}%` }} className={currentRowClass}>
          {label}
        </div>
      </div>
    </div>
  )
}
